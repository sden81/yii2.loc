function dateInit() {
    dp = $(document).find(".dpcls");
    //reinit datepicker with empty value
    dp.each(function (i, elem) {
            if (!$(this).val()) {
                //alert(i);
                this.className += " added";
                this.value = "";
                //заменяем имя с Resume[dateJobTo][число] на Resume[dateJobTo][число + 1]

                str = this.name;
                result = str.match(/\[([0-9]*)\]/); //получаем число
                index = result[1];
                index = (index == "" ) ? 0 : ++index; //увеличиваем его на один

                this.name = this.name.replace(/\[[0-9]*\]/g, `[${index}]`);
                $(document).find(".added")
                    .attr("id", "")
                    .removeClass('hasDatepicker')
                    .removeClass('added')
                    .datepicker()
                    .datepicker("option", "dateFormat", "yy-mm-dd");
            }
        }
    )
}
//dateInit()

$(".add").on("click", function () {
    parent = $(this).parent().find(".root");
    block = parent.children("div.block:last").html();
    parent.append("<div class=\"block\">" + block + "</div>");
    parent.find("div.block:last :input").val("");
    dateInit()
})

$(".my_test_button").on("click", function () {
    parent = $(this).parent().find(".root");
    block = parent.children("div.block:last");
    //dateInput = block.find(".datepicker");
    //dateInput.clone(true,true).appendTo(block);
    dp = block.find(".datepicker");
    /*lastdp.datepicker({format:"y-MM-dd"})
     .removeClass("hasDatepicker")
     .attr("id", "")
     .removeClass('hasDatepicker')
     .removeData('datepicker')
     .datepicker();*/
    dp.datepicker("option", "dateFormat", "yyyy-mm-dd").val()
})