const StorageCtrl = (function(){

    return {
        storeItem: function(item, name){
            items = this.getItemsFromStorage(name);
            items.push(item);
            localStorage.setItem(name, JSON.stringify(items));
        },

        getItemsFromStorage: function(name){
            let items = [];
            if(localStorage.getItem(name) !== null){
                items = JSON.parse(localStorage.getItem(name));
            }
            return items;
        },

        updateItemStorage: function(updatedItem, name){
            let items = JSON.parse(localStorage.getItem(name));

            items.forEach(function(item, index){
                if(updatedItem.id === item.id){
                  items.splice(index, 1, updatedItem);
                }
            });
            localStorage.setItem(name, JSON.stringify(items));
        },

        deleteItemFromStorage: function(id, name){
            let items = JSON.parse(localStorage.getItem(name));

            items.forEach(function(item, index){
                if(id === item.id){
                  items.splice(index, 1);
                }
            });
            localStorage.setItem(name, JSON.stringify(items));
        },

        clearItemsFromStorage: function(name){
          localStorage.removeItem(name);
        }
    }
})();
