.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _developer:

Developer's guide
=================

This chapter contains information targeted at developers.


.. _developer-hooks:

Hooks
-----

Fluid Display contains one hook:

preProcessView
  This method will receive two parameters. The first one is a reference to the
  Fluid view object that will be used for rendering (an instance of
  :code:`\TYPO3\CMS\Fluid\View\StandaloneView`). The second parameter is a
  back-reference the current instance of :code:`\Tesseract\Fluiddisplay\Component\DataConsumer`.
  This hook mostly makes it possible to assign additional variables to the Fluid view.


.. _developer-view-helpers:

View helpers
------------

There are not many hooks in Fluid Display mostly because it relies on Fluid for rendering, which is
already powerful and flexible enough. If you have some special needs in your rendering the way to go
is to create custom view helpers.
