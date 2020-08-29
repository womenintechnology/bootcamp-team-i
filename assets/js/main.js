import Test from "./components/test";
import Utils from "./base/utils";


class App {
    constructor() {
        this.init();
    }

    init() {
        new Test();
        new Utils();
    }
}

document.addEventListener("DOMContentLoaded", () => new App());
