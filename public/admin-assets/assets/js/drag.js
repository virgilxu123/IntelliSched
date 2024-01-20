const fills = document.querySelectorAll('.fill');
const empties = document.querySelectorAll('.empty');

// Add listeners for each fill element
fills.forEach(fill => {
    fill.addEventListener('dragstart', dragStart);
    fill.addEventListener('dragend', dragEnd);
});

// Loop through empties and call drag events
empties.forEach(empty => {
    empty.addEventListener('dragover', dragOver);
    empty.addEventListener('dragenter', dragEnter);
    empty.addEventListener('dragleave', dragLeave);
    empty.addEventListener('drop', dragDrop);
});

// Drag functions
function dragStart() {
    this.classList.add('hold');
    setTimeout(() => this.classList.add('invisible'), 0);
}

function dragEnd() {
    this.classList.remove('hold', 'invisible');
}

function dragOver(e) {
    e.preventDefault();
}

function dragEnter(e) {
    e.preventDefault();
    this.classList.add('hovered');
}

function dragLeave() {
    this.classList.remove('hovered');
    console.log('dragLeave');
}

function dragDrop() {
    this.classList.remove('hovered');
    this.appendChild(document.querySelector('.hold'));
    document.querySelector('.hold').classList.remove('mb-3');
}