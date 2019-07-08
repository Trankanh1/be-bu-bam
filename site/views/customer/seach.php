<html>
    <head>
        <title>Demo Search Basic by freetuts.net</title>
    </head>
    <body>
        <div align="center">
            <form action=" method="post">
                Search: <input type="text" name="search" />
                <button type="submit" name="submit"  >tìm</button>
            </form>
            <form action="<?php echo BASE_URL?>?p=customer&act=seach" method="post">
            Search: <input type="text" name="search" />
            <button type="submit" name="submit">search</button>
        </form>
        </div>
        
    </body>
</html>