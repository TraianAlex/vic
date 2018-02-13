const UIInc = (function(){
    const UISelectors = {
        itemList: '#item-list-inc',
        listItems: '#item-list-inc li',
        addBtn: '.add-btn-inc',
        updateBtn: '.update-btn-inc',
        deleteBtn: '.delete-btn-inc',
        backBtn: '.back-btn-inc',
        clearBtn: '.clear-btn-inc',
        itemNameInput: '#item-name-inc',
        itemCadInput: '#item-cad-inc',
        totalCad: '.total-cad-inc',
        total: '.total-cad-diff'
    }

    return {
        populateItemList: function(items){
            let html = '';

            items.forEach(function(item){
                html += `<li class="list-group-item" id="iteminc-${item.id}">
                <strong>${item.name}: $</strong> <em>${item.cad}</em>
                <a href="#" class="badge badge-primary badge-pill float-right ml-2">
                  <i class="edit-item-inc fa fa-pencil"></i>
                </a>
              </li>`;
            });
            // Insert list items
            document.querySelector(UISelectors.itemList).innerHTML = html;
        },

        getItemInput: function(){
            return {
                name:document.querySelector(UISelectors.itemNameInput).value,
                cad:document.querySelector(UISelectors.itemCadInput).value
            }
        },

        addListItem: function(item){
            // Show the list
            document.querySelector(UISelectors.itemList).style.display = 'block';
            // Create li element
            const li = document.createElement('li');
            // Add class
            li.className = 'list-group-item';
            // Add ID
            li.id = `iteminc-${item.id}`;
            // Add HTML
            li.innerHTML = `<strong>${item.name}: $</strong> <em>${item.cad}</em>
            <a href="#" class="badge badge-primary badge-pill float-right ml-2">
              <i class="edit-item-inc fa fa-pencil"></i>
            </a>`;
            // Insert item
            document.querySelector(UISelectors.itemList).insertAdjacentElement('beforeend', li)
        },

        updateListItem: function(item){
            let listItems = document.querySelectorAll(UISelectors.listItems);
            // Turn Node list into array
            listItems = Array.from(listItems);

            listItems.forEach(function(listItem){
              const itemID = listItem.getAttribute('id');

              if(itemID === `iteminc-${item.id}`){
                  document.querySelector(`#${itemID}`).innerHTML = `
                      <strong>${item.name}: $</strong> <em>${item.cad}</em>
                      <a href="#" class="badge badge-primary badge-pill float-right ml-2">
                        <i class="edit-item-inc fa fa-pencil"></i>
                      </a>`;
              }
            });
        },

        deleteListItem: function(id){
            const itemID = `#iteminc-${id}`;
            const item = document.querySelector(itemID);
            item.remove();
        },

        clearInput: function(){
            document.querySelector(UISelectors.itemNameInput).value = '';
            document.querySelector(UISelectors.itemCadInput).value = '';
        },

        addItemToForm: function(){
            document.querySelector(UISelectors.itemNameInput).value = ItemInc.getCurrentItem().name;
            document.querySelector(UISelectors.itemCadInput).value = ItemInc.getCurrentItem().cad;
            UIInc.showEditState();
        },

        removeItems: function(){
            let listItems = document.querySelectorAll(UISelectors.listItems);
            // Turn Node list into array
            listItems = Array.from(listItems);

            listItems.forEach(function(item){
              item.remove();
            });
        },

        hideList: function(){
            document.querySelector(UISelectors.itemList).style.display = 'none';
        },

        showTotalCad: function(totalCad){
            document.querySelector(UISelectors.totalCad).textContent = totalCad;
        },

        showTotal: function(total){
            document.querySelector(UISelectors.total).textContent = total;
        },

        clearEditState: function(){
            UIInc.clearInput();
            document.querySelector(UISelectors.updateBtn).style.display = 'none';
            document.querySelector(UISelectors.deleteBtn).style.display = 'none';
            document.querySelector(UISelectors.backBtn).style.display = 'none';
            document.querySelector(UISelectors.addBtn).style.display = 'inline';
        },

        showEditState: function(){
            document.querySelector(UISelectors.updateBtn).style.display = 'inline';
            document.querySelector(UISelectors.deleteBtn).style.display = 'inline';
            document.querySelector(UISelectors.backBtn).style.display = 'inline';
            document.querySelector(UISelectors.addBtn).style.display = 'none';
        },

        getSelectors: function(){
            return UISelectors;
        }
    }
})();
