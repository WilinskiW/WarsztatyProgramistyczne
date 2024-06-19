<?php
interface Employee {
    public function getSalary();
    public function setSalary($salary);
    public function getRole();
}
class Manager implements Employee {
    private $salary;
    private $employees;

    public function __construct($salary) {
        $this->salary = $salary;
        $this->employees = [];
    }

    public function getSalary() {
        return $this->salary;
    }

    public function setSalary($salary) {
        $this->salary = $salary;
    }

    public function getRole() {
        return "Manager";
    }

    public function addEmployee(Employee $employee) {
        $this->employees[] = $employee;
    }

    public function getEmployees() {
        return $this->employees;
    }
}
class Developer implements Employee {
    private $salary;
    private $programmingLanguage;

    public function __construct($salary) {
        $this->salary = $salary;
    }

    public function getSalary() {
        return $this->salary;
    }

    public function setSalary($salary) {
        $this->salary = $salary;
    }

    public function getRole() {
        return "Developer";
    }

    public function setProgrammingLanguage($programmingLanguage) {
        $this->programmingLanguage = $programmingLanguage;
    }

    public function getProgrammingLanguage() {
        return $this->programmingLanguage;
    }
}
class Designer implements Employee {
    private $salary;
    private $designingTool;

    public function __construct($salary) {
        $this->salary = $salary;
    }

    public function getSalary() {
        return $this->salary;
    }

    public function setSalary($salary) {
        $this->salary = $salary;
    }

    public function getRole() {
        return "Designer";
    }

    public function setDesigningTool($designingTool) {
        $this->designingTool = $designingTool;
    }

    public function getDesigningTool() {
        return $this->designingTool;
    }
}