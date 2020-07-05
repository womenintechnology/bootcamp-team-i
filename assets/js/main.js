import Test from "./components/test";

class App {
    constructor() {
        this.init();
    }

    init() {
        new Test();
    }
}

document.addEventListener("DOMContentLoaded", () => new App());
