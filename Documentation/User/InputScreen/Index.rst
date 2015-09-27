.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _user-input-screen:

Input screen
------------

This is the Fluid Display input screen. Apart from the title, the only really important parameter is
the reference to the Fluid template file.


.. figure:: ../../Images/FluidDisplayElement.png
	:alt: A typical Fluid Display record

	A Fluid Display element and all its input fields

The **Hide** flag is not currently used, although it could be in the future. In the meantime it
can still be used to indicate an unused filter.

The template file can be located either in the "fileadmin" hierarchy or in an extension (using the
:code:`EXT:` syntax). It can be referenced with the syntax :code:`file:xxx` where "xxx" is the uid of
the corresponding sys_file entry. The browser wizard will use that syntax automatically.
