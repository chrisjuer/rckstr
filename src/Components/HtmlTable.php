<?php
/**
 * HtmlTable.class simply creates a Html table.
 * 
 * Table headers are optional and can be added after or between adding table rows.
 * Headers can be changed by calling addColumnHeaders() more than once.
 * 
 * @author Christoph Jürgens <chris.to.the.toph@gmail.com>
 * @version 0.1
 * @copyright 2017
 */

namespace DanceClasses\App;

class HtmlTable
{
    /**
     * HTML code of table
     *
     * @var string
     */
    private $table;

    /**
     * Simple array without keys of column headers
     *
     * @var array
     */
    private $tableHeaders;

    /**
     * Multiple array of row data
     *
     * @var array
     */
    private $tableRows = [];

    
    /**
     * Constructor of HtmlTable.class class.
     * Creates a caption tag if a table name gets passed in.
     * Also a CSS class can be added to the <table> tag.
     *
     * @param string $tableName Name of table, creates a <caption> tag if not empty
     * @param string $tableClass CSS class which can be added to the <table> tag
     */
    public function __construct($tableName = '', $tableClass = ''){

	    $this->tableHeaders = [];

        $this->table = ($tableClass === '') ? '<table>' : '<table class="' . $tableClass . '">';
        if ($tableName !== '') {
            $this->table .= '<caption>' . $tableName . '</caption>';
        }
    }


    /**
     * Add column headers to the table.
     * This function is optional, if it does not get used or an empty array gets passed in, no <thead> will be created.
     *
     * @param array $columnHeaders
     * @return void
     */
    public function addColumnHeaders($columnHeaders){

        $this->tableHeaders = $columnHeaders;
    }


    /**
     * Add a single row to the table. Headers do not count as a row.
     * An empty array can be passed to create an empty row.
     *
     * @param array $row
     * @return void
     */
    public function addRow($row){

        $this->tableRows[] = $row;
    }


    /**
     * Echo the HTML code of the table
     * If column headers were added, a data-label will be added to each cell
     *
     * @return string
     */
    public function display(){

        /**
        * Joining the table parts together
        */

        // Adding table header
        if(!empty($this->tableHeaders)){
            $this->table .= $this->createTableHead();
        } 

        // Adding table rows
        if(!empty($this->tableRows)){
            $this->table .= $this->createTableBody();
        }

        // Closing table tag
        $this->table .= '</table>';


        /**
        * Echo HTML table
        */
       echo $this->table;
    }

    /**
     * Creates the HTML code of <thead>
     *
     * @return string
     */
    private function createTableHead(){
        
        $tableHead = '<thead>';
        $tableHead .= '<tr>';
        
        foreach ( $this->tableHeaders as $columnHeader ) {
                    
            $tableHead .= '<th scope="col">' . ucfirst( $columnHeader ) . '</th>';
        }
        
        $tableHead .= '</tr>';
        $tableHead .= '</thead>';
        
        return $tableHead;
    }

    /**
     * Creates the HTML code of <tbody>
     *
     * @return string
     */
    private function createTableBody(){

        $tableBody = '<tbody>';

        foreach($this->tableRows as $row){

            $tableBody .= '<tr>';

            if(empty($this->tableHeaders)){

                foreach($row as $cell){
                    $tableBody .= '<td>' . $cell . '</td>';
                }

            }else{
                
                $i = 0;

                foreach($row as $cell){
                    $tableBody .= '<td data-label="' . $this->tableHeaders[$i] . '">' . $cell . '</td>';
                    $i++;
                }
            }

            $tableBody .= '</tr>';
        }
        
        $tableBody .= '</tbody>';

        return $tableBody;
    }

}