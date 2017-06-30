function dateInit(){
    alert ("sdsd");
    $(document).find(".datepicker")
        .datepicker({format:"y-MM-dd"})
        .removeClass("hasDatepicker")
        .attr("id", "")
        .removeClass('hasDatepicker')
        .removeData('datepicker')
        .datepicker();
}
dateInit()

$(".add").on("click", function(){
    parent = $(this).parent().find(".root");
    block = parent.children("div.block").html();
    parent.append("<div class=\"block\">"+block+"</div>");
    parent.find("div.block:last input,textarea").val("");
    dateInit()
})

$(".my_test_button").on("click", function(){
    parent = $(this).parent().find(".root");
    block = parent.children("div.block");
    dateInput = block.find(".datepicker:last");
    dateInput.clone(true,true).appendTo(block);
    lastdp = block.find(".datepicker:last");
    lastdp.datepicker({format:"y-MM-dd"})
        .removeClass("hasDatepicker")
        .attr("id", "")
        .removeClass('hasDatepicker')
        .removeData('datepicker')
        .datepicker();
})