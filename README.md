Symfony Project - Custom JetBrains Enterprise Plugin Repository 
========================

# Resources

 - [Adding Plugins to Enterprise Repositories](https://www.jetbrains.com/help/idea/2017.1/adding-plugins-to-enterprise-repositories.html)

https://www.jetbrains.com/help/idea/2017.1/adding-plugins-to-enterprise-repositories.html

# Client Installation

Add custom repository channel url

 - [See Managing Enterprise Plugin Repositories](https://www.jetbrains.com/help/idea/2017.1/managing-enterprise-plugin-repositories.html)
 - http://127.0.0.1:8000/plugins/stable/list

# Output Examples

´´´xml
<?xml version="1.0" encoding="UTF-8"?>
<plugin-repository>
   <idea-plugin downloads="1" size="1" date="1494678505650" url="http://127.0.0.1:8000/plugins/foobar">
      <id>foobar</id>
      <name>foobar</name>
      <rating>4.3</rating>
      <description>Foobar Description</description>
      <version>1.6</version>
      <change-notes>My changes</change-notes>
      <download-url>http://127.0.0.1:8000/plugins/download/0399652c-71fd-45e6-a85b-2e0c33edcdd7</download-url>
   </idea-plugin>
   <idea-plugin downloads="1" size="1" date="1494678505650" url="http://127.0.0.1:8000/plugins/foobar2">
      <id>foobar2</id>
      <name>foobar2</name>
      <rating>4.3</rating>
      <description>Foobar Description</description>
      <version>1.6</version>
      <change-notes>My changes</change-notes>
      <download-url>http://127.0.0.1:8000/plugins/download/0399652c-71fd-45e6-a85b-2e0c33edcdd7</download-url>
   </idea-plugin>
</plugin-repository>
´´´