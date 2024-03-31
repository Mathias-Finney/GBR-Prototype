<script type="text/javascript">
    var all_terminalsArray = @json($all_terminals->toArray());


    var allTerminalsNames = [];

    for (var i = 0; i < all_terminalsArray.length; i++) {

        var a = Object.values(all_terminalsArray[i]);
        var b = a.toString();
        allTerminalsNames.push(b);
    }

    let all_terminals_sort = allTerminalsNames.sort();



    // For the travel from input box
    let travelFrom = document.getElementById("travel-from");

    travelFrom.addEventListener("keyup", (e) => {

        removeElements();
        let inputValue1 = travelFrom.value.toLowerCase();

        // initially remove all elements
        // removeElements();

        for (let i of all_terminals_sort) {
            //converting input to lower case and compare with each string
            if (i.toLowerCase().startsWith(inputValue1) && inputValue1 !== "") {
                let listItem = document.createElement('li');
                listItem.classList.add('list-items');
                listItem.style.cursor = "pointer";
                listItem.setAttribute("onclick", "displayNames('" + i + "')");

                //Display matched part in bold
                let word = "<b>" + i.substr(0, inputValue1.length) + "</b>";
                word += i.substr(inputValue1.length);

                listItem.innerHTML = word;
                document.querySelector(".list1").appendChild(listItem);
            }
        }
    });

    function displayNames(value) {
        travelFrom.value = value;
        removeElements();
    }

    function removeElements() {
        let items = document.querySelectorAll(".list-items");
        items.forEach((item) => {
            item.remove();

        });
    }


    // For the travel to input box
    let travelTo = document.getElementById("travel-to");

    travelTo.addEventListener("keyup", (e) => {

        removeElements();
        let inputValue2 = travelTo.value.toLowerCase();

        // initially remove all elements
        // removeElements();

        for (let i of all_terminals_sort) {
            //converting input to lower case and compare with each string
            if (i.toLowerCase().startsWith(inputValue2) && inputValue2 !== "") {
                let listItem = document.createElement('li');
                listItem.classList.add('list-items');
                listItem.style.cursor = "pointer";
                listItem.setAttribute("onclick", "displayNames2('" + i + "')");

                //Display matched part in bold
                let word = "<b>" + i.substr(0, inputValue2.length) + "</b>";
                word += i.substr(inputValue2.length);

                listItem.innerHTML = word;
                document.querySelector(".list2").appendChild(listItem);
            }
        }
    });

    function displayNames2(value) {
        travelTo.value = value;
        removeElements();
    }

    function removeElements() {
        let items = document.querySelectorAll(".list-items");
        items.forEach((item) => {
            item.remove();

        });
    }
</script>