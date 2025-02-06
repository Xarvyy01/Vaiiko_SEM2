
async function submit() {

    const name_first = document.getElementById('names').value;


    let url = "http://127.0.0.1//?c=reservation&a=who";
    let body = {
        "names": names,
    };


    let response = await fetch(url, {
        method: "POST",
        body: JSON.stringify(body),
        headers: {
            "Content-type": "application/json",
            "Accept": "application/json",
        }
    });

    if (response.ok) {
        const data = await response.json();
        const ret = data["ret"];
        if (ret === true) {
            alert("Karol gay");
            event.preventDefault(); // Zrušte predvolené akcie, ak sú chyby
        } else {
            alert("Email je už zaregistrovaný.");
            this.submit();
        }
    }
}

