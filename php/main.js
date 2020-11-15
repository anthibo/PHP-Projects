let id = $("input[name*='book_id']");
id.attr("readonly","readonly");
$(".btnedit").click(e=>{
    let textValues = getData(e);
    let bookname = $("input[name*='book_name']");
    let bookpublisher = $("input[name*='book_publisher']");
    let bookprice = $("input[name*='book_price']");
    id.val(textValues[0]);
    bookname.val(textValues[1]);
    bookpublisher.val(textValues[2]);
    bookprice.val(textValues[3].replace("$",""));
});
function getData(e){
    let id= 0;
    const td=$("#tbody tr td");
    let textValues = [];
    for(const value of td){
        if (value.dataset.id==e.target.dataset.id){
            textValues[id++] = value.textContent;
        }
    }
    return textValues;
}