import Drawer from '@mui/material/Drawer'
import React from 'react'
import List from '@mui/material/List'
import ListItem from '@mui/material/ListItem'
import ListItemIcon from '@mui/material/ListItemIcon'
import ListItemText from '@mui/material/ListItemText'
import Divider from '@mui/material/Divider'
import { sidemenuLinks, sidemenuOptions } from '@/js/Constants/Layout/sidemenuLinks'
import linkToOptions from '@/js/Partials/Layout/Sidemenu'
import Toolbar from '@mui/material/Toolbar'
import Box from '@mui/material/Box'

const Sidemenu = () => {
  return (
    <Drawer
      variant="permanent"
      sx={{
        width: 300,
        flexShrink: 0,
        ['& .MuiDrawer-paper']: { width: 300, boxSizing: 'border-box' },
      }}>
      <Toolbar />
      <Box sx={{ overflow: 'auto' }}>
        <List>
          {sidemenuLinks.map((link, index) => (
            <ListItem button key={index}>
              <ListItemIcon>
                {link.icon}
              </ListItemIcon>
              <ListItemText primary={link.name} />
            </ListItem>
          ))}
        </List>
        <Divider />
        <List>
          {sidemenuOptions.map((link, index) => (
            <ListItem button onClick={() => linkToOptions(link)} key={index}>
              <ListItemIcon>
                {link.icon}
              </ListItemIcon>
              <ListItemText primary={link.name} />
            </ListItem>
          ))}
        </List>
      </Box>
    </Drawer>
  )
}

export default Sidemenu
