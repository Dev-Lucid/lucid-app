lucid-app
=========

== What is it?
A framework for building one or more websites and managing them over their lifecycle. This includes:
* A deployment strategy
* Database patching
* Major library upgrading

== What is provided by default?
* A bootstrap-based template that requests content from your server, and expects back JSON
* A router that packages up a response in JSON
* A simple database to get you going
* An ORM that helps you read/write to your database
* A JS and Less compiler/minifier. The aforementioned bootstrap template has a single css include, and a single js include. 

== What libraries/submodules does it use?
* Bootstrap, and I'll try to keep this updated to work with the newest version
* A port of the less compiler to PHP (note: NOT leafo's less compiler)
* jQuery 

== Operating system support
* OSX, you're good to go.
* Linux, you're good to go.
* Windows, install cygwin with ssh and git and you'll be pretty close. The management scripts are all written in bash with no windows script analogs written (and they may never be). 

The version control system assumes git, and the deployment scripts assume you're using ssh to connect to the server; so to fully utilize the framework those should be considered the minimum. Without too much difficulty, one could do deployments by hand and remove the need for ssh, but you're just making your life harder IMO.

== How would I use this to manage a project?

Here's several broad/long term use case scenarios:

=== Starting an entirely new project
First you need to check out the framework. So, just pick a directory and clone the lucid-app repo to it, and then init the submodules:
'''
git clone git://github.com/DevLucid/lucid-app.git;
cd lucid-app;
bin/init.sh;
'''

Next, create your project. All projects must end with '.webapp'. Let's say you want to create a project named 'myforum.webapp':

'''
bin/new-app.sh myforum.webapp;
'''
This will create a new directory: apps/myforum.webapp. Everything you'll need to edit to work on your project goes in here. 


== How about some examples of smaller tasks?

Here ya go: