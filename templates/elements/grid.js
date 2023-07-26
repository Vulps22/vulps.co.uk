// grid-container.js
export class GridContainer extends HTMLElement {
    connectedCallback() {
      this.classList.add('container');
    }
  }
  
  // grid-row.js
  export class GridRow extends HTMLElement {
    connectedCallback() {
      this.classList.add('row');
    }
  }
  
  // grid-col.js
  export class GridCol extends HTMLElement {
    connectedCallback() {
      const cols = this.getAttribute('cols'); // Default to full width (12 columns)
      if(cols) this.classList.add('col-' + cols);
      else this.classList.add('col');
    }
  }
  