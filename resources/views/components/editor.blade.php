<style>
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css");

    .tool-list {
        display: inline-flex;

        list-style: none;
        padding: 0;
        margin: 3px;
        overflow: hidden;
        border-radius: 5px;


    }

    .tool {
        margin: 2px;
        border-radius: 5px !important;
    }


    .tool--btn {
        display: block;
        border: none;
        padding: .5rem;
        font-size: 18px;
        transition-duration: 0.2s;
        cursor: pointer;
        border-radius: 0px !important;
        background-color: rgb(238, 238, 238) !important;
        color: black;
        border-radius: 5px;

    }

    #output {
        background-color: white;
        overflow: auto;

    }

    #output ol,
    #output ul {
        padding: 6px 25px !important;

    }

    #output h3 {
        color: var(--roy);
    }

    #output h2 {
        font-size: 30px !important;
        margin: 15px 0;
        text-align: center;
    }

    #output h3 {
        font-size: 23px !important;
        margin: 10px 0;
    }

    .active-tool:hover,
    .active-tool:focus {
        color: var(--roy);
        background-color: var(--roy-opt) !important;
    }
</style>
<center>


    <ul class='tool-list'>
        <li class="tool">
            <button type="button" data-command="html" data-command-argument="h2" class="tool--btn active-tool">
                <i class="bi bi-type-h2"></i>
            </button>
        </li>
        <li class="tool">
            <button type="button" data-command="html" data-command-argument="h3" class="tool--btn active-tool">
                <i class="bi bi-type-h3"></i>
            </button>
        </li>
        <li class="tool">
            <button type="button" data-command="html" data-command-argument="p" class="tool--btn active-tool">
                <i class="bi bi-paragraph"></i>
            </button>
        </li>
    </ul>


    <ul class="tool-list">
        <li class="tool">
            <button type="button" data-command='justifyRight' class="tool--btn active-tool">
                <i class="bi bi-justify-right"></i>
            </button>
        </li>

        <li class="tool">
            <button type="button" data-command='justifyCenter' class="tool--btn active-tool">
                <i class="bi bi-text-center"></i>
            </button>
        </li>
        <li class="tool">
            <button type="button" data-command='justifyLeft' class="tool--btn active-tool">
                <i class="bi bi-justify-left"></i>
            </button>
        </li>
        <li class="tool">
            <button type="button" data-command='justifyFull' class="tool--btn active-tool">
                <i class="bi bi-justify"></i>
            </button>
        </li>
    </ul>
    <ul class="tool-list">
        <li class="tool">
            <button type="button" data-command="bold" class="tool--btn active-tool">
                <i class="bi bi-type-bold"></i>
            </button>
        </li>
        <li class="tool">
            <button type="button" data-command="italic" class="tool--btn active-tool">
                <i class="bi bi-type-italic"></i>
            </button>
        </li>
        <li class="tool">
            <button type="button" data-command="underline" class="tool--btn active-tool">
                <i class="bi bi-type-underline"></i>
            </button>
        </li>


        <li class="tool">
            <button type="button" data-command="strikethrough" class="tool--btn active-tool">
                <i class="bi bi-type-strikethrough"></i>
            </button>
        </li>

    </ul>
    <ul class="tool-list">
        <li class="tool">
            <button type="button" data-command="insertOrderedList" class="tool--btn active-tool">
                <i class="bi bi-list-ol"></i>
            </button>
        </li>
        <li class="tool">
            <button type="button" data-command="insertUnorderedList" class="tool--btn active-tool">
                <i class="bi bi-list-ul"></i>
            </button>
        </li>
        <li class="tool">
            <button type="button" data-command="createlink" class="tool--btn active-tool">
                <i class="bi bi-link-45deg"></i>
            </button>
        </li>
    </ul>
    <ul class="tool-list">
        <li class="tool">
            <button type="button" data-command="removeformat" class="tool--btn active-tool">
                <i class="bi bi-eraser"></i>
            </button>
        </li>
        <li class="tool">
            <button type="button" data-command="undo" class="tool--btn active-tool">
                <i class="bi bi-arrow-clockwise"></i>
            </button>
        </li>
        <li class="tool">
            <button type="button" data-command="redo" class="tool--btn active-tool">
                <i class="bi bi-arrow-counterclockwise"></i>
            </button>
        </li>


    </ul>


</center>


<script>
    let output = document.getElementById('output');
    let buttons = document.getElementsByClassName('tool--btn');
    for (let btn of buttons) {
        btn.addEventListener('click', () => {
            let cmd = btn.dataset['command'];
            let arg = btn.getAttribute('data-command-argument');
            if (cmd === 'createlink') {
                let url = prompt("Enter the link here: ", "http:\/\/");
                document.execCommand(cmd, false, url);
            } else if (cmd === "html") {
                document.execCommand('formatBlock', false, arg);
            } else {
                document.execCommand(cmd, false, null);
            }
        })
    }
</script>
