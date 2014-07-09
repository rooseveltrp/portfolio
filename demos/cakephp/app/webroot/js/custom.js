$(".load_source").click(function(){

    var target = $(this).attr('href') + " div";
    var dataSource = $(this).attr('data-source')

    $(target).load(dataSource, function(){
        SyntaxHighlighter.highlight()
    });

});