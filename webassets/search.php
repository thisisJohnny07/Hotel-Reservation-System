<head>
<style>
    /* SEARCH */

    .topnav {
        overflow: hidden;
        background-color: #333;
        display: flex;
        justify-content: center; /* Center align the content horizontally */
        width: 100%;
        padding: 15px 0;
    }

    .search-container {
        display: flex;
        justify-content: center;
        align-items: center; /* Center align the content vertically */
        flex-wrap: nowrap;
    }

    label {
        color: white;
        margin-bottom: 5px;
        display: block; /* Make labels block-level elements */
    }

    input[type="submit"] {
        background-color: #b49852;
        color: white;
        padding: 8px 20px;
        cursor: pointer;
        margin-top: 25px;
        border: 0;
    }

    input {
        width: 100%; /* Adjusted width to match other inputs */
        padding: 6px;
        border: 1px solid #ccc;
        border-radius: 2px;
        box-sizing: border-box;
        margin-top: 3px;
    }

    @media screen and (max-width: 768px) {
        .search-container {
            flex-direction: column;
        }

        .column {
            margin: 10px 0;
        }
    }
</style>
</head>
<div class="topnav">
    <form action="rates.php" method="POST">
        <div class="search-container">
            <div class="column">
                <div class="input-wrapper">
                    <label for="checkIn">Check In</label>
                    <input type="date" placeholder="Search.." name="checkIn" required>
                </div>
            </div>
            <div class="column">
                <div class="input-wrapper">
                    <label for="checkOut">CheckOut</label>
                    <input type="date" placeholder="Search.." name="checkOut" required>
                </div>
            </div>
            <div class="column">
                <div class="input-wrapper">
                    <label for="adult">Adult</label>
                    <input type="number" name="adult" required>
                </div>
            </div>
            <div class="column">
                <div class="input-wrapper">
                    <label for="kids">Kids</label>
                    <input type="number" name="kids" required>
                </div>
            </div>
            <div class="column">
                <input type="submit" value="Search">
            </div>
        </div>
    </form>
</div>
