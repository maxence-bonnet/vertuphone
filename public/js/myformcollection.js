/**
 * 
 */
 class DynamicFormCollection {
    constructor({
        addFormButtonsSelector,
        collectionItemClasses,
        type,
    }) {
        this.addFormButtonsSelector = addFormButtonsSelector ?? '.addSubformButton';
        this.addFormButtons = document.querySelectorAll(this.addFormButtonsSelector );
        if (this.addFormButtons.length === 0)
            throw new Error(`no addSubformButton found with selector : ${this.addFormButtonsSelector}`);
        this.collectionItemClasses = collectionItemClasses ?? ['shadow', 'p-3', 'rounded-md'];
        this.type = type ?? 'regular';
        this.init();
    }

    init () {
        for (let button of this.addFormButtons) {
            button = new AddSubformButton({
                element: button,
                collectionItemClasses: this.collectionItemClasses,
                type: this.type,
            });
        }
    }
}

class AddSubformButton {
    constructor ({
        element,
        collectionItemClasses,
        type,
    }) {
        if (null === element)
            throw new Error(`no element given for AddSubformButton`);
        this.button = element;
        this.target = element.dataset.target;
        this.collectionItemClasses = collectionItemClasses;
        this.collectionHolder = new CollectionHolder({
            element: this.getCollectionHolder(),
            subFormPrototype: this.getSubformPrototype(),
            collectionItemClasses: this.collectionItemClasses,
            type,
        });
        this.init();
    }

    init () {
        this.button.addEventListener('click', () => {
            this.collectionHolder.embedNewSubform();
        });
    }

    getCollectionHolder () {
        let collectionHolder = document.querySelector(`#${this.target}`);
        if (null === collectionHolder)
            throw new Error(`collectionHolder not found with selector : #${this.target}`);
        return collectionHolder;
    }

    getSubformPrototype () {
        let subFormPrototype = document.querySelector(`#${this.target}-form-prototype`);
        if (null === subFormPrototype)
            throw new Error(`subFormPrototype not found with selector : #${this.target}-form-prototype}`);
        if (undefined === subFormPrototype.dataset.prototype)
            throw new Error(`prototype not defined in subFormPrototype`);
        return subFormPrototype.dataset.prototype;
    }
}

class CollectionHolder {
    constructor ({
        element,
        subFormPrototype,
        collectionItemClasses,
        type,
    }) {
        if (null === element) {
            return;
        }
        this.holder = element;
        this.collectionItemClasses = collectionItemClasses;
        this.itemsCollection = [];
        this.subFormPrototype = subFormPrototype;
        this.type = type;
        this.index = element.querySelectorAll('.collectionItem').length;
        this.init();
    }

    init () {
        this.initExistingSubForms();
    }

    initExistingSubForms () {
        for (let subForm of this.holder.querySelectorAll('.collectionItem')) {
            let item;
            item = new CollectionItem({
                element: subForm
            });                
            item.init();
            this.itemsCollection.push(item);
        }
    }

    embedNewSubform () {
        let newItem;
        newItem = new CollectionItem({
            element: this.createNewSubform(),
        });

        this.holder.appendChild(newItem.subForm);
        newItem.init();
        this.itemsCollection.push(newItem);
        this.index++;
    }

    createNewSubform () {
        let newForm = document.createElement('div');
        newForm.classList.add('collectionItem');
        for (let collectionItemClass of this.collectionItemClasses) {
            newForm.classList.add(collectionItemClass);
        }
        newForm.innerHTML = this.subFormPrototype.replace(/__name__/g, this.index);
        return newForm;
    }
}

class CollectionItem {
    constructor ({
        element
    }) {
        if (null === element) {
            throw new Error(`no element given for CollectionItem`);
        }
        this.subForm = element;
    }

    init () {
        this.initRemove();
    }

    initRemove () {
        let removeButton = this.subForm.querySelector('button');
        if (null !== removeButton) {
            removeButton.addEventListener('click', () => {
                this.subForm.remove();
            })             
        }

    }
}
