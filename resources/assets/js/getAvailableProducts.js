
const apiRoot = 'http://localhost/dstore/public/api/';
const getProducts = apiRoot + 'products/available';

const getToken = apiRoot + 'token';

axios.get(getToken)
    .then(function(response){
        var url = getProducts + '?api_token=' + response.data;
        if (response.data) {
            axios.get(url)
                .then(function (response) {
                    var container = document.getElementById('listProducts');
                    if(container) {
                        var product = response.data.forEach(function (product) {
                            var elem = document.createElement('li');
                            elem.innerHTML = '<span>' + product.name + '</span>' +
                                '<span class="pull-right badge">$' + product.price + '</span>' +
                                '<span class="pull-right">' + product.quantity + ' available &nbsp;</span>';
                            elem.classList.add('list-group-item');
                            container.appendChild(elem);
                        });
                    }
                });
        }
        else {
            document.getElementById('listProducts').innerHTML =
                '<li class="list-group-item">You have to be logged in to preview the available products</li>';
        }
    });

