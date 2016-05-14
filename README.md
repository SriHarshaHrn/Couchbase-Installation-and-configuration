Couchbase-Installation-and-configuration and access data buckets with with laravel5.2
-------------------------------------------------------------------------------------
**Author:** Sri Harsha Turaka                
**Created Date:**--------**Version**
  
  May 11 2016---------------1.0.0    
  
  May 14 2016---------------1.0.1
  
**Description:** Step by step instructions to install and configure couchbase and make it work with larvel 5.2



**Note**: These instructions apply for UBUNTU 14.04. If you are using something other OS, instructions may vary. 

**Step-1:**

Download couchbase server from http://www.couchbase.com/nosql-databases/downloads. to your preferable path. 

**Step-2:** 

Open terminal and run below command. 
>> apt-get install libssl*version*

once ssl installation completes,

>> sudo dpkg -i /downloaded-path/downloaded-couchbase-server-file-name.deb

Couchbase server starts automatically once instatallation completes. 

**Step-3:**
 
 . Open a browser and navigate to http://hostname:8091/.
 
 . In the URL, hostname represents the name or IP address of the computer that hosts Couchbase Server. If Couchbase Server is running locally,   enter localhost for the host name.
 
 . Click Setup.
 
 . On the Configure Server screen (Step 1 of 5), click Next to accept the default values for a new cluster.
 
 . On the Sample Buckets screen (Step 2 of 5), under Available Samples select the two samples we will use later in this tutorial: beer-sample and travel-sample and click Next.
 
 . On the Create Default Bucket screen (Step 3 of 5), under Memory Size set the Per Node RAM Quota to 100 MB and click Next.
 
 . On the Notifications screen (Step 4 of 5), enter your registration information, agree to the terms and conditions, and click Next.
 
 . On the Configure Server screen (Step 5 of 5), enter and verify a password for the administrator account, and click Next.
 
 . The Couchbase Web Console opens and displays the Cluster Overview.
 
 **Step-4:**
 
 With the completion of step 3, you should be able to see couchbase console(ADMIN) panel. Browse through data buckets and also 
 see sample data inside the example buckets(beer-sample,travel-sample). 
 
 Now inorder to work with couchbase using laravel, you need to install C SDK and PHP SDK using below commands. 
 
 *C SDK Installation*
 >> sudo wget http://packages.couchbase.com/releases/couchbase-release/couchbase-release-1.0-0-amd64.deb 
 
 >> sudo dpkg -i /path/couchbase-release-1.0-0-amd64.deb
 
 >> sudo apt-get update
 
 >> sudo apt-get install libcouchbase-dev libcouchbase2-bin build-essential
 
 *PHP SDK Installtion* (Make sure, you have already installed PECL dependencies like php-5 perl.)
 
 >> pear config-set php_ini /etc/php5/apache2/php.ini
 
 >> pecl config-set php_ini /etc/php5/apache2/php.ini
 
 >> sudo pecl install couchbase 
 
 Once this step completes, you shouldbe able to see couchbase details in phpinfo(); 
 
 
 **Step-5:**
 
 Now your couchbase server is up and running and can be accessible through laravel. I am not providing 
 laravel installation instructions here, as it is out of context. Once you download and install laravel 5.2, proceed to Step -6
 
 **Step-6**
 
 In terminal, go your root laravel project folder where you have your composer.json file and run below command.
 
 >> composer require ytake/laravel-couchbase
 
 This will install required dependencies to your project to connect to couchbase. 
 
 Now, go to your config/app.php and add below lines under 'providers' section. 
 
 'providers' => [
 
    \Ytake\LaravelCouchbase\CouchbaseServiceProvider::class,
    
]

Go to your, config/database.php and add couchbase driver and set default connection to 'couchbase'(from mysql)

'couchbase' => [

   'driver' => 'couchbase',
   
   'host' => 'couchbase://127.0.0.1',
   
   'user' => 'userName',
   
   'password' => 'password',
   
],

Go to config/cache.php and add couchbase entry

'couchbase' => [

   'driver' => 'couchbase',
   
   'bucket' => 'session'
   
],


**Step-7**

By completion of step-6, everything is ready to work with couchbase using laravel. I am attaching Sample Controller and 
Sample Model to give basic idea on how to do CRUD operations.

First check the Model, you will get idea on couchbase CRUD syntax. Then check controller which gives idea on usage.  


*Hope this helps!Thanks and enjoy!! :)* 



 
 
 
 
 
 





