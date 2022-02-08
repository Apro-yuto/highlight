import React from 'react'
import WorkerList from '@/js/components/Example'
import { Fab } from '@mui/material/'
import AddIcon from '@mui/icons-material/Add'
import { FabStyle } from '@/js/Constants/toStoreButtonProps'

interface Props {
  data: Array<string>
  user: {
    name: string
  }
}

const Reg: React.VFC<Props> = (props) => {
  return (
    <>
      <p>{props.user.name}</p>
      <WorkerList workerArr={props.data} />
      <Fab
        component="a"
        href="/item/store"
        sx={FabStyle}
        variant="circular"
        color="inherit"
      >
        <AddIcon sx={{ fill: '#AFDFE4', fontSize: { xs: 40, lg: 50 } }} />
      </Fab>
    </>
  )
}

export default Reg
