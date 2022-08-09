class Footer extends HTMLElement {
    constructor() {
        super();
    }

    connectedCallback() {
        this.innerHTML = `
             <footer class="footer">
                <div class="container">
                    <div class="footer-data">
                        <div class="footer-desc">
                            <span>AS ZIŅAS</span>
                            <span>Piemēra iela 4-8, Rīga, LV-1004</span>
                            <span>+371 12345678</span>
                            <span>piemers@zinas.lv</span>
                        </div>
        
                        <div class="copyright">
                            <span class="copyright_desc">Izstrādāja: Jānis Šņoriņš</span>
                        </div>
                    </div>
                </div>
            </footer>
    `;
    }
}

customElements.define('footer-component', Footer);