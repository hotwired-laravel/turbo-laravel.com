import { Controller } from "@hotwired/stimulus"

// Connects to data-controller="nav-highlight"
export default class extends Controller {
    static targets = ['nav'];
    static values = {
        css: { type: String, default: 'active' },
    };

    connect() {
        this.navTargets.forEach(nav => {
            let currentSelectedItem = this._findCurrentSelectedItem(nav);

            if (! currentSelectedItem) return;

            this._highlightElement(nav, currentSelectedItem);
        })
    }

    _findCurrentSelectedItem(el) {
        return this._allLinks(el).find(a => {
            return a.href.endsWith(window.location.pathname);
        });
    }

    _highlightElement(nav, currentLink) {
        this._allLinks(nav).forEach(a => {
            a.classList.remove(this.cssValue);
        });

        currentLink.classList.add(this.cssValue);
    }

    _allLinks(nav) {
        return [...nav.querySelectorAll('a')];
    }
}
