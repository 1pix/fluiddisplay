.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _user-view-helpers:

Built-in view helpers
---------------------

Since version 1.3.0, a View Helper is provided by extension "fluiddisplay". It can be used to take
any content and use it as the current page's title.

Here is an example usage, assuming we are displaying the details of a FE user:

.. code:: html

    {namespace fd = Tesseract\Fluiddisplay\ViewHelpers}
    <f:for each="{datastructure.fe_users.records}" as="user">
        <h2><fd:substitutePageTitle output="true">{user.name}</fd:substitutePageTitle></h2>
        <div>{user.address}</div>
    </f:for>


The above template will display the FE user's name inside a :code:`<h2>` tag but also replace the title of
the current page with that name. If the "output" attribute is not used (or is set to :code:`false`), this
view helper will produce no output.
