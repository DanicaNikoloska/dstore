const apiRoot = 'http://localhost/dstore/public/api/';
const getProducts = apiRoot + 'products/available';
axios.get(getProducts)
    .then(function(response){
        var container = document.getElementById('listProducts');
        var product = response.data.forEach(function (product) {
            var elem = document.createElement('li');
            elem.innerHTML = '<span>'+product.name+'</span>' +
                '<span class="pull-right badge">$'+ product.price + '</span>' +
                '<span class="pull-right">'+ product.quantity +' available &nbsp;</span>';
            elem.classList.add('list-group-item');
            container.appendChild(elem);
        });
    });