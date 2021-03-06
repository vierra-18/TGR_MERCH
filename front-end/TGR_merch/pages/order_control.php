<?php
    session_start();

    try{
        $host = "localhost";
        $port = "3306";
        $dbUserName = "root";
        $dbPassword = "root";
        $dbName = "tgr_merch";
        $tableDB = "users";

        $dbconn = new PDO("mysql:host=$host;port=$port;dbname=$dbName;user=$dbUserName;password=$dbPassword");

        if ($dbconn)
        {
            //echo "<h1>Connection attempt succeeded</h1>";  

            //Entered Username and Password
            /*echo "<h2>Connection Information</h2>";
            echo "Username Entered: " . $_POST['username'] . "<br>";
            echo "Password Entered: " . $_POST['password'] . "<br>";*/

            //Entered Username and Password
            $username = $_POST['username'];
            $password = $_POST['password'];

            //Entered Username and Password
            $dbUser = null;
            $dbPass = null;
            $role = null;

            $stmt = $dbconn->prepare('SELECT * FROM users WHERE username = :n');
            $stmt->bindParam('n', $username);
            $stmt->execute();

            //echo "<br>";

            

            //Fetches the Data base
            while($row = $stmt->fetch())
            {
                $dbUser = $row['username'];
                $dbPass = $row['password'];
                $role = $row['role'];

                //echo $dbUser. " " . $dbPass . " " . $role. "<br>";
            }

            /*
            echo "<br>";


            echo "Database Username: " . $dbUser . "<br>";
            echo "Database Password: " . $dbPass . "<br>";
            echo "Database Role: " . $role . "<br>";
            echo "<br><br>";

            echo "<h2>Output:</h2>";*/

            //The Checker
            if( empty($username) && empty($password) )
            {
                //throw new NullValueException();

                //Unsets the sessions
                unset($_SESSION['username']);
                unset($_SESSION['supersecret']);

                $_SESSION['wrong'] = "Username and Password is Empty";
                header('Location:login.php');
            }

            else if(trim($username) === $dbUser)
            {
                if($password === $dbPass)
                {  
                    $_SESSION['username'] = $dbUser;
                    $_SESSION['supersecret'] = $dbPass;

                    header('Location:databaseControl.php?status=SUCCESS');
                    //echo "You did it. You crazy son of a bitch, you logged in with username: " . $username;

                }

                else
                {
                    //Error 2 (Wrong Password)
                    //throw new AuthenticationException_2();
                  
                    //Unsets the sessions
                    unset($_SESSION['username']);
                    unset($_SESSION['supersecret']);

                    $_SESSION['wrong'] = "Wrong Username or Password";
                    header('Location:login.php');
                } 

            }

            else 
            {
                
                if(empty($password))
                {
                    //Error 1 (Not in Database)
                    //throw new AuthenticationException_1();

                    //Unsets the sessions
                    unset($_SESSION['username']);
                    unset($_SESSION['supersecret']);

                    $_SESSION['wrong'] = "Empty Password";
                    header('Location:login.php');
                }

                else
                {
                    //Error 3 (Wrong Username and Password)
                    //throw new AuthenticationException_3();

                    //Unsets the sessions
                    unset($_SESSION['username']);
                    unset($_SESSION['supersecret']);

                    $_SESSION['wrong'] = "Wrong Username or Password";
                    header('Location:login.php');
                }
            }

        } 

        else 
        {
            //Error Page to no Connection for server
            echo 'Connection attempt failed.';
            //header('Location:login.php');
        }

    }
    catch(PDOException $e)
    {
        die('Connection Error: ' . $e->getMessage() );
    }
?>