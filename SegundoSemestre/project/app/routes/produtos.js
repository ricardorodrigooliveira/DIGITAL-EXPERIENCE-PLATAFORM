module.exports = function(app){

app.get('/produtos', function(req, res){

    var connection = app.config.dbConnection();
    var produtosModel = app.app.models.produtosModel;

    produtosModel.getProdutos(connection, function(error, result){
      // res.send(result);
      res.render("produtos/produtos", {produtos : result} );
 
    });
  });
}
