import { Controller } from "@hotwired/stimulus"

// Connects to data-controller="nav-highlight"
export default class extends Controller {
    static classes = ['css'];

    connect() {
        let currentSelectedItem = this.findCurrentSelectedItem();

        if (! currentSelectedItem) return;

        this.highlightElement(currentSelectedItem);
    }

    findCurrentSelectedItem() {
        return this.allLinks.find(a => {
            return a.href.endsWith(window.location.pathname);
        });
    }

    highlight(event) {
        if (! event.target.matches('a')) return;

        window.dispatchEvent(new CustomEvent('nav-highlighted', { detail : { href: event.target.href } }));
    }

    highlightFromHref({ detail: { href } }) {
        this.highlightElement(this.allLinks.find(a => a.href === href));
    }

    highlightElement(el) {
        this.allLinks.forEach(a => {
            a.classList.remove(this.cssClass);
        });

        el.classList.add(this.cssClass);
    }

    get allLinks() {
        return [...this.element.querySelectorAll('a')];
    }
}
