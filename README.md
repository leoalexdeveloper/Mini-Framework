# Mini-Framework
Mini-Framework

#There are a initial framework on php.

At this moment this is only a router system when in the routes file we put the routes assigned like this: [controller/action]. 

Each route is precessed by an a dispatch class that looking for the route file., classes and actions. 

For each request have sucess its important that the route exist, the file with a controller name exist inside the controller folder, 
inside this must there a class with this same name, and the action are on this controller file. 

Inside each controller have an request to a class named execute. The Actions are new classes at the Action folder inside the controller folder.

Only the action method must be there inside the controller file. The real Action must be declared at the folder action inside a file with same name of the action, 
and the subfolders inside the Action filder must follow the patterns [folder named like a controller term] => [file named like a action term].

Exemple:

Uri = controller/action

Route must be [controller/action]

Looking for a controller folder: controller_folder/controller_file

Looking for a action folder: controller_folder/action_folder/action_file
