

    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    
    <body>
    
        <h2>Modal Example</h2>
    
        <!-- Trigger/Open The Modal -->
        <button class="myBtn_multi">Open Modal</button>
        <button class="myBtn_multi">Open Modal2</button>
    
        <!-- The Modal -->
        <div class="modal modal_multi">
    
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close close_multi"></span>
                <p>Some text in the Modal..</p>
            </div>
    
        </div>
    
        <!-- The Modal -->
        <div  class="modal modal_multi">
    
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close close_multi"></span>
                <p>Some text in the Modal..2</p>
            </div>
    
        </div>
        <!-- Trigger/Open The Modal -->
        <button id="myBtn">Open Modal --- OLD</button>
    
        <!-- The Modal -->
        <div id="myModal" class="modal">
    
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">x</span>
                <p>Some text in the Modal. OLD.</p>
            </div>
    
        </div>
        <script>
            // Get the modal
    
            var modalparent = document.getElementsByClassName("modal_multi");
    
            // Get the button that opens the modal
    
            var modal_btn_multi = document.getElementsByClassName("myBtn_multi");
    
            // Get the <span> element that closes the modal
            var span_close_multi = document.getElementsByClassName("close_multi");
    
            // When the user clicks the button, open the modal
            function setDataIndex() {
    
                for (i = 0; i < modal_btn_multi.length; i++)
                {
                    modal_btn_multi[i].setAttribute('data-index', i);
                    modalparent[i].setAttribute('data-index', i);
                    span_close_multi[i].setAttribute('data-index', i);
                }
            }
    
    
    
            for (i = 0; i < modal_btn_multi.length; i++)
            {
                modal_btn_multi[i].onclick = function() {
                    var ElementIndex = this.getAttribute('data-index');
                    modalparent[ElementIndex].style.display = "block";
                };
    
                // When the user clicks on <span> (x), close the modal
                span_close_multi[i].onclick = function() {
                    var ElementIndex = this.getAttribute('data-index');
                    modalparent[ElementIndex].style.display = "none";
                };
    
            }
    
            window.onload = function() {
    
                setDataIndex();
            };
    
            window.onclick = function(event) {
                if (event.target === modalparent[event.target.getAttribute('data-index')]) {
                    modalparent[event.target.getAttribute('data-index')].style.display = "none";
                }
    
                // OLD CODE
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            };
    
    //XXXXXXXXXXXXXXXXXXXXXXX    Modified old code    XXXXXXXXXXXXXXXXXXXXXXXXXX
    
    // Get the modal
    
            var modal = document.getElementById('myModal');
    
    // Get the button that opens the modal
            var btn = document.getElementById("myBtn");
    
    // Get the <span> element that closes the modal
            var span = modal.getElementsByClassName("close")[0]; // Modified by dsones uk
    
    // When the user clicks on the button, open the modal
    
            btn.onclick = function() {
    
                modal.style.display = "block";
            }
    
    // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }
    
    
    
        </script>
    
    <style>
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    </body>
    </html>
