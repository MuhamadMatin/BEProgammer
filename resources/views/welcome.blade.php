<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Left Sidebar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="p-4 col-3 bg-light border-end">
                <h4>Resto</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
            </div>
            <div class="p-4 col-9">
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <form class="d-flex justify-content-end" role="search">
                                <input id="search" class="form-control me-2" type="search" placeholder="Search"
                                    aria-label="Search" oninput="searchData()">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </nav>
                <div id="resultContainer"></div>
                <p>This is the main content area of the page.</p>
                <div class="gap-3 d-flex">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ url('storage/images/image.jpg') }}"
                            class="border rounded card-img-top object-fit-cover"
                            alt="{{ url('storage/images/image.jpg') }}">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <div class="col d-flex">
                                <p class="card-text">Kategori: </p>
                                <p class="card-text">Mobil</p>
                            </div>
                            <div class="col d-flex">
                                <p class="card-text">Harga: </p>
                                <p class="card-text">Rp. 20000</p>
                            </div>
                            <div class="col d-flex">
                                <p class="card-text">Tgl berlaku: </p>
                                <p class="card-text">10-11-2024</p>
                            </div>
                            <button type="button" class="my-10 btn d-block btn-sm btn-outline-success">Success</button>
                            <div href="#" class="btn btn-primary fload-end w-fit">Go somewhere</div>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img src="{{ url('storage/images/image.jpg') }}" class="card-img-top"
                            alt="{{ url('storage/images/image.jpg') }}">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <div class="col d-flex">
                                <p class="card-text">Kategori: </p>
                                <p class="card-text">Mobil</p>
                            </div>
                            <div class="col d-flex">
                                <p class="card-text">Harga: </p>
                                <p class="card-text">Rp. 20000</p>
                            </div>
                            <div class="col d-flex">
                                <p class="card-text">Tgl berlaku: </p>
                                <p class="card-text">10-11-2024</p>
                            </div>
                            <button type="button"
                                class="my-10 btn d-block btn-sm btn-outline-success">Success</button>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img src="{{ url('storage/images/image.jpg') }}" class="card-img-top"
                            alt="{{ url('storage/images/image.jpg') }}">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <div class="col d-flex">
                                <p class="card-text">Kategori: </p>
                                <p class="card-text">Mobil</p>
                            </div>
                            <div class="col d-flex">
                                <p class="card-text">Harga: </p>
                                <p class="card-text">Rp. 20000</p>
                            </div>
                            <div class="col d-flex">
                                <p class="card-text">Tgl berlaku: </p>
                                <p class="card-text">10-11-2024</p>
                            </div>
                            <button type="button"
                                class="my-10 btn d-block btn-sm btn-outline-success">Success</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        const data = ["Tan Muatan", "Muatan", "Pertanian", "Hutan", "Dragonball", "Gonzales", "Ali yaqin", "Ghozali"];

        function searchData() {
            const searchInput = document.getElementById('search').value.toLowerCase();
            const resultContainer = document.getElementById('resultContainer');
            resultContainer.innerHTML = '';

            if (searchInput === '') {
                return;
            }

            const matchedData = data.filter(item => item.toLowerCase().includes(searchInput));

            if (matchedData.length === 0) {
                resultContainer.innerHTML = 'No results found.';
            } else {
                matchedData.forEach(item => {
                    const regex = new RegExp(`(${searchInput})`, 'gi');
                    const highlightedItem = item.replace(regex, `<span class="highlight">$1</span>`);
                    resultContainer.innerHTML += `<div>${highlightedItem}</div>`;
                });
            }
        }
    </script>
</body>

</html>
