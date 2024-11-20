$(document).ready(function () {
    var width = screen.width - 100;
    var height = screen.height - 200;
    var bubbleInterval;
    var gameRunning = false;
    var score = 0; // Initialize score

    // Display score on the screen
    const $scoreDisplay = $('<div id="scoreDisplay"></div>');
    $('body').append($scoreDisplay);
    $scoreDisplay.css({
        position: 'fixed',
        top: '10px',
        left: '10px',
        fontSize: '20px',
        color: '#333'
    });

    function getRandomAlphabet() {
        let randomCharCode = Math.floor(Math.random() * (90 - 65 + 1)) + 65;
        return String.fromCharCode(randomCharCode);
    }

    function getRandomColor() {
        let letters = '0123456789ABCDEF';
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    function getRandomPosition() {
        let randomX = Math.floor(Math.random() * width);
        let randomY = Math.floor(Math.random() * height);
        return { x: randomX, y: randomY };
    }

    function createBubble() {
        let letter = getRandomAlphabet();
        let position = getRandomPosition();
        let bubbleColor = getRandomColor();

        let $bubble = $('<div class="bubble"></div>').text(letter);
        $bubble.css({
            left: position.x + 'px',
            top: position.y + 'px',
            backgroundColor: bubbleColor
        });

        $('body').append($bubble);

        // Remove bubble after 5 seconds if not clicked
        setTimeout(function () {
            $bubble.remove();
        }, 5000);
    }

    // Start the game: Generates bubbles and listens for key presses
    function startGame() {
        if (!gameRunning) {
            bubbleInterval = setInterval(createBubble, 2000);
            $(document).on('keypress', handleKeyPress);
            gameRunning = true;
        }
    }

    // Stop the game: Clears bubbles, keypress handler, and intervals
    function stopGame() {
        clearInterval(bubbleInterval); // Stop creating new bubbles
        $(document).off('keypress');   // Remove the keypress event handler
        $('.bubble').remove();         // Remove all existing bubbles
        gameRunning = false;
        alert('Game Stopped! Your final score is: ' + score);
        score = 0; // Reset score
        $('#scoreDisplay').text(`Score: ${score}`);
    }

    // Handle keypress to pop the bubbles and update score
    function handleKeyPress(event) {
        let keyPressed = String.fromCharCode(event.which).toUpperCase();

        $('.bubble').each(function () {
            if ($(this).text() === keyPressed) {
                $(this).fadeOut(); // Fade out the bubble
                $(this).remove(); // Remove bubble from DOM
                score++; // Increment score
                $('#scoreDisplay').text(`Score: ${score}`); // Update score display
            }
        });
    }

    // Start game when the Start button is clicked
    $('#startBtn').click(function () {
        startGame();
    });

    // Stop game when the Stop button is clicked
    $('#stopBtn').click(function () {
        stopGame();
    });
});
