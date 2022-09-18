import { Controller } from "@hotwired/stimulus"

// Connects to data-controller="nav-highlight"
export default class extends Controller {
    static targets = ['nav'];
    static classes = ['css'];

    connect() {
        this.navTargets.forEach(nav => {
            let currentSelectedItem = this._findCurrentSelectedItem(nav);

            if (! currentSelectedItem) return;

            this._highlightElement(nav, currentSelectedItem);
        })
    }

    highlightFromLoad({ target }) {
        if (! target.src) return;

        this.navTargets.forEach(nav => {
            let currentSelectedItem = this._findCurrentSelectedByHref(nav, target.src);

            if (! currentSelectedItem) return;

            this._highlightElement(nav, currentSelectedItem);
        })
    }

    _findCurrentSelectedItem(el) {
        return this._allLinks(el).find(a => {
            return a.href.endsWith(window.location.pathname);
        });
    }

    _findCurrentSelectedByHref(nav, href) {
        return this._allLinks(nav).find(a => {
            return a.href === href;
        });
    }

    _highlightElement(nav, currentLink) {
        this._allLinks(nav).forEach(a => {
            a.classList.remove(this.cssClass);
        });

        currentLink.classList.add(this.cssClass);
    }

    _allLinks(nav) {
        return [...nav.querySelectorAll('a')];
    }
}
