$(function() {
    $("#loadUsers").click(loadUsers);
});

function loadUsers() {
    $("#dataJQuery").html("");
    var table = document.createElement("table");
    table.classList.add("tableData");
    $.getJSON("api/records/users", function(result) {
        $.each(result.records, function(i, user) {
            table.appendChild(loadUser(user));
        });
        $("#dataJQuery").append(table);
    });
}

function loadUser(user) {
    
    var tr = document.createElement("tr");
    tr.classList.add("fila");
    var id = document.createElement("td");
    id.innerHTML = user.id;
    var first_name = document.createElement("td");
    first_name.innerHTML = user.first_name;
    var last_name = document.createElement("td");
    last_name.innerHTML = user.last_name;
    tr.appendChild(id);
    tr.appendChild(first_name);
    tr.appendChild(last_name);
    return tr;
}