.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _user-fluid-partials:

Using Fluid partials
--------------------

It is possible to use Fluid partials inside the template, as is demonstrated in the
:ref:`sample template <user-sample-template>`. The rule to follow is simple:
the partials must be stored in a "Partials" folder located at the same place as the same template.

**Example:**

Assuming your template file is located in :file:`fileadmin/templates/fluid/myTemplate.html`,
Fluid will expect your partials to be in :file:`fileadmin/templates/fluid/Partials/`.
