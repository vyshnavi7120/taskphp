let id = $("input[name*='formdata_id']")
id.attr("readonly","readonly");


$(".btnedit").click( e =>{
    let textvalues = displayData(e);

    ;
    let formdataname = $("input[name*='formdata_name']");
    let formdatacity = $("input[name*='formdata_city']");
    let formdataoccupation = $("input[name*='formdata_occupation']");

    id.val(textvalues[0]);
    formdataname.val(textvalues[1]);
    formdatacity.val(textvalues[2]);
    formdataoccupation.val(textvalues[3]);
});


function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td){
        if(value.dataset.id == e.target.dataset.id){
           textvalues[id++] = value.textContent;
        }
    }
    return textvalues;

}
?>
