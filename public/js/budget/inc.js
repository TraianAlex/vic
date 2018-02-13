const Inc = (function(ItemInc, StorageCtrl, UIInc){
    const income = 'income';
    // Load event listeners
    const loadEventListeners = function(){
        // Get UI selectors
        const UISelectors = UIInc.getSelectors();
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
        document.querySelector(UISelectors.backBtn).addEventListener('click', UIInc.clearEditState);
        document.querySelector(UISelectors.clearBtn).addEventListener('click', clearAllItemsClick);
    }

    const itemAddSubmit = function(e){
        // Get form input from UI Controller
        const input = UIInc.getItemInput();
        // Check for name and calorie input
        if(input.name !== '' && input.cad !== ''){
          // Add item
          const newItem = ItemInc.addItem(input.name, input.cad);
          // Add item to UI list
          UIInc.addListItem(newItem);
          // Get total cad
          const totalCad = ItemInc.getTotalCad();
          UIInc.showTotalCad(totalCad);
          const total = ItemInc.getTotalCad() - ItemCtrl.getTotalCad();
          UIInc.showTotal(total);
          //Store in localStorage
          StorageCtrl.storeItem(newItem, income);
          // Clear fields
          UIInc.clearInput();
        }
        e.preventDefault();
    }

    const itemEditClick = function(e){
        if(e.target.classList.contains('edit-item-inc')){
            // Get list item id (item-0, item-1)
            const listId = e.target.parentNode.parentNode.id;
            // Break into an array
            const listIdArr = listId.split('-');
            // Get the actual id
            const id = parseInt(listIdArr[1]);
            // Get item
            const itemToEdit = ItemInc.getItemById(id);
            // Set current item
            ItemInc.setCurrentItem(itemToEdit);
            // Add item to form
            UIInc.addItemToForm();
        }
        e.preventDefault();
    }

    const itemUpdateSubmit = function(e){
        // Get item input
        const input = UIInc.getItemInput();
        // Update item
        const updatedItem = ItemInc.updateItem(input.name, input.cad);
        // Update UI
        UIInc.updateListItem(updatedItem);
         // Get total cad
         const totalCad = ItemInc.getTotalCad();
         UIInc.showTotalCad(totalCad);
         const total = ItemInc.getTotalCad() - ItemCtrl.getTotalCad();
         UIInc.showTotal(total);
         // Update local storage
         StorageCtrl.updateItemStorage(updatedItem, income);
         UIInc.clearEditState();
        e.preventDefault();
    }

    const itemDeleteSubmit = function(e){
        // Get current item
        const currentItem = ItemInc.getCurrentItem();
        // Delete from data structure
        ItemInc.deleteItem(currentItem.id);
        // Delete from UI
        UIInc.deleteListItem(currentItem.id);
        // Get total cad
        const totalCad = ItemInc.getTotalCad();
        UIInc.showTotalCad(totalCad);
        const total = ItemInc.getTotalCad() - ItemCtrl.getTotalCad();
        UIInc.showTotal(total);
        // Delete from local storage
        StorageCtrl.deleteItemFromStorage(currentItem.id, income);
        UIInc.clearEditState();
        e.preventDefault();
    }

    const clearAllItemsClick = function(){
        // Delete all items from data structure
        ItemInc.clearAllItems();
        // Get total cad
        const totalCad = ItemInc.getTotalCad();
        UIInc.showTotalCad(totalCad);
        const total = ItemInc.getTotalCad() - ItemCtrl.getTotalCad();
        UIInc.showTotal(total);
        // Remove from UI
        UIInc.removeItems();
        // Clear from local storage
        StorageCtrl.clearItemsFromStorage(income);
        // Hide UL
        UIInc.hideList();
    }

    return {
        init: function(){
            // Clear edit state / set initial set
            UIInc.clearEditState();
            // Fetch items from data structure
            const items = ItemInc.getItems();
            // Check if any items
            if(items.length === 0){
              UIInc.hideList();
            } else {
              // Populate list with items
              UIInc.populateItemList(items);
            }
            // Get total cad
            const totalCad = ItemInc.getTotalCad();
            UIInc.showTotalCad(totalCad);
            const total = ItemInc.getTotalCad() - ItemCtrl.getTotalCad();
            UIInc.showTotal(total);
            // Load event listeners
            loadEventListeners();
        }
    }
})(ItemInc, StorageCtrl, UIInc);

Inc.init();
