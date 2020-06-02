<?php
 
 
class Booking
{
    private $dbh;
    private $bookingsTableName = 'booking';
 
    /**
     * Booking constructor.
     * @param string $database
     * @param string $host
     * @param string $databaseUsername
     * @param string $databaseUserPassword
     */
    public function __construct($database, $host, $databaseUsername, $databaseUserPassword)
    {
        try {
 
            $this->dbh =
                new PDO(sprintf('mysql:host=%s;dbname=%s', $host, $database),
                    $databaseUsername,
                    $databaseUserPassword
                );
 
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
 
    public function index()
    {
        $statement = $this->dbh->query('SELECT * FROM ' . $this->bookingsTableName);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
 
    public function add(DateTimeImmutable $bookingDate)
    {
        $statement = $this->dbh->prepare(
            'INSERT INTO ' . $this->bookingsTableName . ' (Date) VALUES (:bookingDate)'
        );
 
        if (false === $statement) {
            throw new Exception('Invalid prepare statement');
        }
 
        if (false === $statement->execute([
                ':bookingDate' => $bookingDate->format('Y-m-d'),
            ])) {
            throw new Exception(implode(' ', $statement->errorInfo()));
        }
    }
 
    public function delete($Id)
    {
        $statement = $this->dbh->prepare(
            'DELETE from ' . $this->bookingsTableName . ' WHERE Id = :Id'
        );
        if (false === $statement) {
            throw new Exception('Invalid prepare statement');
        }
        if (false === $statement->execute([':Id' => $Id])) {
            throw new Exception(implode(' ', $statement->errorInfo()));
        }
    }
 
}