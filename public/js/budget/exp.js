const Exp = (function(ItemCtrl, StorageCtrl, UICtrl){
    const expenses = 'expenses';
    // Load event listeners
    const loadEventListeners = function(){
        // Get UI selectors
        const UISelectors = UICtrl.getSelectors();
        // Add item event
        document.querySelector(UISelectors.addBtn).addEventListener('click', itemAddSubmit);
        // Disable submit on enter
        document.addEventListener('keypress', function(e){
            if(e.keyCode === 13 || e.which === 13){
              e.preventDefault();
              return false;
            }
        });

        document.querySelector(UISelectors.itemList).addEventListener('click', itemEditClick);
        document.querySelector(UISelectors.updateBtn).addEventListener('click', itemUpdateSubmit);
        document.querySelector(UISelectors.deleteBtn).addEventListener('click', itemDeleteSubmit);
        document.querySelector(UISelectors.backBtn).addEventListener('click', UICtrl.clearEditState);
        document.querySelector(UISelectors.clearBtn).addEventListener('click', clearAllItemsClick);
    }

    const itemAddSubmit = function(e){
        // Get form input from UI Controller
        const input = UICtrl.getItemInput();
        // Check for name and calorie input
        if(input.name !== '' && input.cad !== ''){
          // Add item
          const newItem = ItemCtrl.addItem(input.name, input.cad);
          // Add item to UI list
          UICtrl.addListItem(newItem);
          // Get total cad
          const totalCad = ItemCtrl.getTotalCad();
          UICtrl.showTotalCad(totalCad);
          const total = ItemInc.getTotalCad() - ItemCtrl.getTotalCad();
          UICtrl.showTotal(total);
          //Store in localStorage
          StorageCtrl.storeItem(newItem, expenses);
          // Clear fields
          UICtrl.clearInput();
        }
        e.preventDefault();
    }

    const itemEditClick = function(e){
        if(e.target.classList.contains('edit-item')){
            // Get list item id (item-0, item-1)
            const listId = e.target.parentNode.parentNode.id;
            // Break into an array
            const listIdArr = listId.split('-');
            // Get the actual id
            const id = parseInt(listIdArr[1]);
            // Get item
            const itemToEdit = ItemCtrl.getItemById(id);
            // Set current item
            ItemCtrl.setCurrentItem(itemToEdit);
            // Add item to form
            UICtrl.addItemToForm();
        }
        e.preventDefault();
    }

    const itemUpdateSubmit = function(e){
        // Get item input
        const input = UICtrl.getItemInput();
        // Update item
        const updatedItem = ItemCtrl.updateItem(input.name, input.cad);
        // Update UI
        UICtrl.updateListItem(updatedItem);
         // Get total cad
         const totalCad = ItemCtrl.getTotalCad();
         UICtrl.showTotalCad(totalCad);
         const total = ItemInc.getTotalCad() - ItemCtrl.getTotalCad();
         UICtrl.showTotal(total);
         // Update local storage
         StorageCtrl.updateItemStorage(updatedItem, expenses);
         UICtrl.clearEditState();
        e.preventDefault();
    }

    const itemDeleteSubmit = function(e){
        // Get current item
        const currentItem = ItemCtrl.getCurrentItem();
        // Delete from data structure
        ItemCtrl.deleteItem(currentItem.id);
        // Delete from UI
        UICtrl.deleteListItem(currentItem.id);
        // Get total cad
        const totalCad = ItemCtrl.getTotalCad();
        UICtrl.showTotalCad(totalCad);
        const total = ItemInc.getTotalCad() - ItemCtrl.getTotalCad();
        UICtrl.showTotal(total);
        // Delete from local storage
        StorageCtrl.deleteItemFromStorage(currentItem.id, expenses);
        UICtrl.clearEditState();
        e.preventDefault();
    }

    const clearAllItemsClick = function(){
        // Delete all items from data structure
        ItemCtrl.clearAllItems();
        // Get total cad
        const totalCad = ItemCtrl.getTotalCad();
        UICtrl.showTotalCad(totalCad);
        const total = ItemInc.getTotalCad() - ItemCtrl.getTotalCad();
        UICtrl.showTotal(total);
        // Remove from UI
        UICtrl.removeItems();
        // Clear from local storage
        StorageCtrl.clearItemsFromStorage(expenses);
        // Hide UL
        UICtrl.hideList();
    }

    return {
        init: function(){
            // Clear edit state / set initial set
            UICtrl.clearEditState();
            // Fetch items from data structure
            const items = ItemCtrl.getItems();
            // Check if any items
            if(items.length === 0){
              UICtrl.hideList();
            } else {
              // Populate list with items
              UICtrl.populateItemList(items);
            }
            // Get total cad
            const totalCad = ItemCtrl.getTotalCad();
            UICtrl.showTotalCad(totalCad);
            // Load event listeners
            loadEventListeners();
        }
    }
})(ItemCtrl, StorageCtrl, UICtrl);

Exp.init();
