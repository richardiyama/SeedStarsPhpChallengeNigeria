@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">You are Welcome!!!</div>

                <div class="panel-body">
                    <div class="jumbotron" style="font-family:arial;">
                        <center><h3><b>Seedstars PHP Challenge-Nigeria</b></h3></center>
                        <br/>
                        <p> <b>The purpose of this challenge is to understand how you use PHP.</b></p>
                        <hr size="30" style="height:1px;border:none;color:#333;background-color:#B0BEC5;">
                        <h3><b>Console Script</b></h3>

                        <p>Jenkins (http://jenkins-ci.org/) is a open source continuous integration server.</p>

                        <p>
                            Create a script, in PHP, that uses Jenkins' API to get a list of jobs and their status from a given jenkins instance. The status for each job should be stored in an sqlite database along with the time for when it was checked.
                        </p>
                        <hr size="30" style="height:1px;border:none;color:#333;background-color:#B0BEC5;">
                        <h3> <b>Full App</b> </h3>


                        <p>
                            Make an application which stores names and email addresses in a database (SQLite is fine). 
                        </p>

                        <ul>
                            <li>a) Has welcome page in http://localhost/ 
                                <ul>
                                    <li>- this page has links to list and create functions</li></li>
                        </ul> 
                        <li>b) Lists all stored names / email address in http://localhost/list</li>
                        <li>c) Adds a name / email address to the database in http://localhost/add
                            <ul>
                                <li>  - should validate input and show errors</li>
                            </ul>
                        </li>
                        </ul>

                        <p>
                            Since you’re doing an application in make sure the app does not have major security problems: CSRF, XSS, SQL Injection.
                        </p>
                        <p>
                            Make reasonable assumptions, state your assumptions, and proceed. Once you 
                            have completed the challenge let us know and share your thoughts on the 
                            problems/solutions.
                        </p>

                        <p>
                            <b>Good luck!</b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
