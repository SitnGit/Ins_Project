// resources/js/example.js

function exampleComponent() {
    return {
        message: 'Hello, Alpine.js!',
        toggleMessage() {
            this.message = (this.message === 'Hello, Alpine.js!') ? 'Alpine.js is awesome!' : 'Hello, Alpine.js!';
        }
    };
}

window.exampleComponent = exampleComponent;
