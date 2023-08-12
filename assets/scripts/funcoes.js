const clickUsuarios = document.getElementById('clickUsuarios');
const clickFornecedores = document.getElementById('clickFornecedores');
const clickCliente = document.getElementById('clickCliente');
const clienteTab = document.getElementById('cliente-tab');
const usuarioTab = document.getElementById('usuario-tab');
const fornecedorTab = document.getElementById('fornecedor-tab');
const portletTitle = document.querySelector('.portlet-title');


clickCliente.addEventListener('click', function () {
    clienteTab.style.display = 'block';
    usuarioTab.style.display = 'none';
    fornecedorTab.style.display = 'none';
    portletTitle.style.background = '#27a9e3'; 
    $.ajax({
        url: 'dataRequest.php',
        method: 'GET',
        data: { action: 'clientes' },
        success: function (data) {
            clienteTab.querySelector('tbody').innerHTML = data;
        }
    });
});
clickFornecedores.addEventListener('click', function () {
    clienteTab.style.display = 'none';
    usuarioTab.style.display = 'none';
    fornecedorTab.style.display = 'block';
    portletTitle.style.background = '#852b99'; 
    $.ajax({
        url: 'dataRequest.php',
        method: 'GET',
        data: { action: 'fornecedores' },
        success: function (data) {
            fornecedorTab.querySelector('tbody').innerHTML = data;
        }
    });
});
clickUsuarios.addEventListener('click', function () {
    clienteTab.style.display = 'none';
    usuarioTab.style.display = 'block';
    fornecedorTab.style.display = 'none';
    portletTitle.style.background = '#28b779'; 
    $.ajax({
        url: 'dataRequest.php',
        method: 'GET',
        data: { action: 'usuarios' },
        success: function (data) {
            usuarioTab.querySelector('tbody').innerHTML = data;
        }
    });
    
});


