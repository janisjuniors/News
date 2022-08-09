class Header extends HTMLElement {
    constructor() {
        super();
    }

    connectedCallback() {
        this.innerHTML = `
            <header>
                <div class="container">
                    <div class="nav-container">
                        <a href="http://localhost:8080">
                            <img class="logo" src="https://cdn-icons-png.flaticon.com/512/831/831311.png?w=740" alt="logo">
                        </a>
                        <nav class="nav">
                            <a href="http://localhost:8080/bizness" class="nav_item">
                                Bizness
                            </a>
        
                            <a href="http://localhost:8080/sports" class="nav_item">
                                Sports
                            </a>
        
                            <a href="http://localhost:8080/izklaide" class="nav_item">
                                Izklaide
                            </a>
        
                            <a href="http://localhost:8080/lietotaja-raksti/pievieno-rakstu" class="nav_item">
                                Pievieno rakstu
                            </a>
        
                            <a href="http://localhost:8080/lietotaja-raksti" class="nav_item">
                                Lietotāju raksti
                            </a>
        
                            <a href="http://localhost:8080/par-mums" class="nav_item">
                                Par mums
                            </a>
        
                            <a href="http://localhost:8080/kontakti" class="nav_item">
                                Kontakti
                            </a>
                        </nav>
                    </div>
                </div>
            </header>
    `;
    }
}

customElements.define('header-component', Header);