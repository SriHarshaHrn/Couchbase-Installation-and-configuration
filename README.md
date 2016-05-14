Couchbase-Installation-and-configuration and access data buckets with with laravel5.2
-------------------------------------------------------------------------------------
**Author:** Sri Harsha Turaka                
**Create Date:**May 11 2016                  
**Last Modified:** May 14 2016               
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
 
 





