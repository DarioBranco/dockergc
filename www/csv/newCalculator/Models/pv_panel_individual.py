from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()

class pv_panel_individual(Base):
	__tablename__ = 'pv_panel_individual'
	id = Column(Integer, primary_key=True)
	SolarPlantID = Column(Text)
	LOC = Column(Text)
	EntryTime = Column(Text)
	ExitTime = Column(Text)
	PeakPower = Column(Text)
	BatteryID = Column(Text)
	InvMakeM = Column(Text)
	InvNum = Column(Text)
	PVpanels = Column(Text)
