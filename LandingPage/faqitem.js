class FaqItem extends HTMLElement {
    constructor() {
        super();
        this.attachShadow({ mode: 'open' });
        this.isOpen = false;
    }

    connectedCallback() {
        this.render();

        // Make header clickable (not just the icon)
        this.shadowRoot.querySelector('.faq-header')
            .addEventListener('click', () => this.toggleAnswer());
    }

    toggleAnswer() {
        // Close other open FAQs
        if (!this.isOpen) {
            document.querySelectorAll('faq-item').forEach(item => {
                if (item !== this && item.isOpen) {
                    item.isOpen = false;
                    const otherAnswer = item.shadowRoot.querySelector('.faq-answer');
                    const otherToggle = item.shadowRoot.querySelector('.faq-toggle');
                    if (otherAnswer && otherToggle) {
                        otherAnswer.style.maxHeight = '0';
                        otherToggle.classList.remove('open');
                    }
                }
            });
        }

        // Toggle current FAQ
        this.isOpen = !this.isOpen;
        const answer = this.shadowRoot.querySelector('.faq-answer');
        const toggle = this.shadowRoot.querySelector('.faq-toggle');

        if (this.isOpen) {
            answer.style.maxHeight = answer.scrollHeight + 'px';
            toggle.classList.add('open');
        } else {
            answer.style.maxHeight = '0';
            toggle.classList.remove('open');
        }
    }

    get question() {
        return this.getAttribute('question') || '';
    }

    get answer() {
        return this.getAttribute('answer') || '';
    }

    render() {
        this.shadowRoot.innerHTML = `
            <style>
                :host {
                    display: block;
                    border-bottom: 1px solid #e5e7eb;
                }
                
                .faq-header {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 1.25rem;
                    cursor: pointer;
                    transition: background-color 0.2s;
                }
                
                .faq-header:hover {
                    background-color: #f9fafb;
                }
                
                .faq-question {
                    font-weight: 600;
                    color: #1f2937;
                    margin: 0;
                    flex: 1;
                }

          .faq-toggle {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 50%;
    background-color: #e0e7ff;
    color: #4f46e5;
    transition: all 0.3s ease;
}

.faq-toggle:hover {
    background-color: #c7d2fe;
}

.arrow-icon {
    width: 1.4rem;
    height: 1.4rem;
    transition: transform 0.3s ease;
}

.faq-toggle.open .arrow-icon {
    transform: rotate(180deg);
}


                .faq-toggle.open {
                    transform: rotate(180deg);
                }

                .faq-answer {
                    max-height: 0;
                    overflow: hidden;
                    transition: max-height 0.3s ease-out;
                    padding: 0 1.25rem;
                    color: #4b5563;
                    background-color: #f8fafc;
                    border-left: 3px solid #c7d2fe;
                }

                .faq-answer-content {
                    padding: 1rem 0;
                }

                @media (max-width: 640px) {
                    .faq-question {
                        font-size: 0.9375rem;
                    }
                }
            </style>
            
            <div class="faq-animate">
                <div class="faq-header">
                    <h3 class="faq-question">${this.question}</h3>
<div class="faq-toggle ${this.isOpen ? 'open' : ''}">
    <svg xmlns="http://www.w3.org/2000/svg" class="arrow-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="6 9 12 15 18 9" />
    </svg>
</div>

                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">${this.answer}</div>
                </div>
            </div>
        `;

        // Re-render feather icons inside shadow DOM
        if (window.feather) {
            window.feather.replace({ class: 'feather-inline', 'stroke-width': 2 });
        }
    }
}

customElements.define('faq-item', FaqItem);
