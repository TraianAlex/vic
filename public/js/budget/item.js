const ItemCtrl = (function(){
    // Item Constructor
    const Item = function(id, name, cad){
        this.id = id;
        this.name = name;
        this.cad = cad;
    }
    // Data Structure / State
    const data = {
        // items: [
        //   // {id: 0, name: 'Steak Dinner', cad: 1200},
        // ],
        items: StorageCtrl.getItemsFromStorage('expenses'),
        currentItem: null,
        totalCad: 0
    }
    // Public methods
    return {
        getItems: function(){
            return data.items;
        },

        addItem: function(name, cad){
            let ID;
            // Create ID
            if(data.items.length > 0){
                ID = data.items[data.items.length - 1].id + 1;
            } else {
                ID = 0;
            }
            // cad to number
            cad = parseInt(cad);
            // Create new item
            newItem = new Item(ID, name, cad);
            // Add to items array
            data.items.push(newItem);
            return newItem;
        },

        getItemById: function(id){
            let found = null;
            // Loop through items
            data.items.forEach(function(item){
                if(item.id === id){
                    found = item;
                }
            });
            return found;
        },

        updateItem: function(name, cad){
            // cad to number
            cad = parseInt(cad);

            let found = null;

            data.items.forEach(function(item){
                if(item.id === data.currentItem.id){
                    item.name = name;
                    item.cad = cad;
                    found = item;
                }
            });
            return found;
        },

        deleteItem: function(id){
            // Get ids
            const ids = data.items.map(function(item){
              return item.id;
            });
            // Get index
            const index = ids.indexOf(id);
            // Remove item
            data.items.splice(index, 1);
        },

        clearAllItems: function(){
            data.items = [];
        },

        setCurrentItem: function(item){
            data.currentItem = item;
        },

        getCurrentItem: function(){
            return data.currentItem;
        },

        getTotalCad: function(){
            let total = 0;
            // Loop through items and add cals
            data.items.forEach(function(item){
                total += item.cad;
            });
            // Set total cal in data structure
            data.totalCad = total;
            // Return total
            return data.totalCad;
        },

        logData: function(){
            return data;
        }
    }
})();
