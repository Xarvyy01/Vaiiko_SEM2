var dropArea = document.getElementById('drop');
var gallery = document.getElementById('gallery');
var src = '';

dropArea.addEventListener('dragover', (event) => {
    event.preventDefault();
    dropArea.classList.add('dragover');
});

dropArea.addEventListener('dragleave', () => {
    dropArea.classList.remove('dragover');
});

dropArea.addEventListener('drop', (event) => {
    event.preventDefault();
    dropArea.classList.remove('dragover');
    const files = event.dataTransfer.files;
    handleFiles(files);
});

function handleFiles(files) {
    [...files].forEach((file) => {
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = (event) => {
                const img = document.createElement('img');
                img.src = event.target.result;
                src = img.src;
                img.style.display = "block";
                img.style.margin = "auto";
                if (gallery.firstChild) {
                    gallery.replaceChild(img, gallery.firstChild);
                } else {
                    gallery.appendChild(img);
                }
            };
            reader.readAsDataURL(file);
        } else {
            alert('Súbor ' + file.name + ' nie je obrázok.');
        }
    });
}

document.getElementById('button').addEventListener('click', async function (event) {

    let url = "http://127.0.0.1//?c=profile&a=changePicture";
    let body = {
        "src": src,
    };

    try {
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
                alert("Nastala chyba");
                event.preventDefault();
            } else {
                alert("Profilova fotka bola aktualizovaná");
                document.forms[0].submit();
            }
        } else {
            console.error("Chyba pri komunikácii so serverom");
        }
    } catch (error) {
        console.error("Nastala chyba:", error);
    }

})



